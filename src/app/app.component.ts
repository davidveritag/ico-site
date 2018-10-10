import { Component, Injectable } from '@angular/core';
import { ScrollToService, ScrollToConfigOptions } from '@nicky-lenaers/ngx-scroll-to';
import { TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
@Injectable()
export class AppComponent {
  title = 'app';
  constructor(private _scrollToService: ScrollToService, private translate: TranslateService){
    // this language will be used as a fallback when a translation isn't found in the current language
    translate.setDefaultLang('en');
    // the lang to use, if the lang isn't available, it will use the current loader to get them
    translate.use('en');
  }
  
  public triggerScrollTo(target:string) {
    console.log(target)
    target = target.replace(/\s/g,''); 
    const config: ScrollToConfigOptions = {
      target: target,
      offset: -57,
    };
    this._scrollToService.scrollTo(config);
  }
}
