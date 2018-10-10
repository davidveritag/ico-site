import { Component, OnInit, AfterViewInit } from '@angular/core';
import * as PicCarousel from 'PicCarousel';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css']
})
export class AboutComponent implements OnInit, AfterViewInit {

  constructor(private translate: TranslateService) {

  } 

  ngOnInit() {
  }

  ngAfterViewInit() {

  }

}
