import { Component, OnInit, Output, EventEmitter, TemplateRef } from '@angular/core';
import { NavigationLink, NavigationLinks, BountyNavigationLinks, FaqLinks } from '../../../data/navlink';
import { Whitepapers } from '../../../data/whitepapers';
import { Navigation } from 'selenium-webdriver';
import { TranslateService } from '@ngx-translate/core';
import { BsModalService } from 'ngx-bootstrap/modal';
import { BsModalRef } from 'ngx-bootstrap/modal/bs-modal-ref.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  modalRef: BsModalRef;
  navlinks: NavigationLink[];
  whitepapers = Whitepapers;
  @Output() clickEvent = new EventEmitter<string>();
  isCollapsed = true;   // store state
  languages = [
    'en',
    'cn',
    'jp',
    'kr'
  ]

  constructor(private translate: TranslateService, private router: Router, private modalService: BsModalService) {
  }

  openModal(template: TemplateRef<any>) {
    this.modalRef = this.modalService.show(template, {class: 'modal-lg'});
  }

  toggleState() { // click handler
      let bool = this.isCollapsed;
      this.isCollapsed = bool === false ? true : false; 
  }

  ngOnInit() {
    if(this.router.url === '/faq' || this.router.url === '/FAQ'){
      this.navlinks = FaqLinks;
    }else if (this.router.url === '/bounty'){
      this.navlinks = BountyNavigationLinks;
    }else{
      this.navlinks = NavigationLinks;
    }
  }

  onLinkClicked(label:string){
    this.toggleState()
    this.clickEvent.emit(label)
  }
  onLanguageSelect(lang:string){
    this.translate.use(lang)
  }
}
