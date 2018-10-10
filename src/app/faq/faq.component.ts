import { Component, OnInit, Output, EventEmitter  } from '@angular/core';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-faq',
  templateUrl: './faq.component.html',
  styleUrls: ['./faq.component.css']
})
export class FaqComponent implements OnInit {

  @Output() navClickEvent = new EventEmitter<string>();

  constructor(private translate: TranslateService) {
  }

  ngOnInit() {
     /* window.location.href = 'https://docs.google.com/spreadsheets/d/1CfYAyN7b5jh9s6MVHBWplclaAn_f7MieHTylcoYA3N0/htmlview#' */
  }

  onNavLinkClicked(label:string){
    this.navClickEvent.emit(label)
  }

}
