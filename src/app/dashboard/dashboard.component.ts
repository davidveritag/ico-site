import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { Logs } from 'selenium-webdriver';
import { log } from 'util';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  @Output() navClickEvent = new EventEmitter<string>();
  constructor(private translate: TranslateService, private router: Router) { }

  ngOnInit() {
  }

  onNavLinkClicked(label:string){
    this.navClickEvent.emit(label)
  }

}
