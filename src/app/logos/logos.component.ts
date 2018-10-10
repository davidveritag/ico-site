import { Component, OnInit } from '@angular/core';
import { logos } from '../../data/logos';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-logos',
  templateUrl: './logos.component.html',
  styleUrls: ['./logos.component.css']
})
export class LogosComponent implements OnInit {
  logos = logos;

  constructor(private translate: TranslateService) {
  }

  ngOnInit() {
  }

}
