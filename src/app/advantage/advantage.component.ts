import { Component, OnInit } from '@angular/core';
import { Feature } from './feature/feature.model';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-advantage',
  templateUrl: './advantage.component.html',
  styleUrls: ['./advantage.component.css']
})
export class AdvantageComponent implements OnInit {
  features: Feature[] = []

  constructor(private translate: TranslateService) {
    $(document).ready(function(){
      var _h = $(window).height();
      var circleTop = $('.circle.container-fluid').offset().top;

      $(window).scroll(function(){
        var top = $(this).scrollTop();

        if (top + _h > circleTop){
          $('.circle.container-fluid').addClass('expand');
        }
      });
    });
    
  }

  ngOnInit() {
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {
      this.features = []
      for(let i=1;i<=4;i++){
        let feature = new Feature(i,'','','')
        feature.iconUrl = '../../assets/icons/Competitive0'+ i +'.png'
        this.translate.get('ADVANTAGE.title' + i).subscribe((res: string) => {
          feature.title = res
        });
        this.translate.get('ADVANTAGE.description' + i).subscribe((res: string) => {
          feature.desc = res
        });
        this.features.push(feature)
      }
    });
  }

}
