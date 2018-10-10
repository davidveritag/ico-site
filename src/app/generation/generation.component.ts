import { Component, OnInit } from '@angular/core';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-generation',
  templateUrl: './generation.component.html',
  styleUrls: ['./generation.component.css']
})
export class GenerationComponent implements OnInit {
  showMore: boolean = false;
  showMoreLabel: string = "Show More";

  constructor(private translate: TranslateService) { }

  toggleShowMore(){
    this.showMore = !this.showMore;
    this.translate.get('GENERATION.' + (this.showMore ? "Show Less" : "Show More")).subscribe((res: string) => {
      this.showMoreLabel = res
    });
  }

  ngOnInit() {
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {

      this.translate.get('GENERATION.' + (this.showMore ? "Show Less" : "Show More")).subscribe((res: string) => {
        this.showMoreLabel = res
      });
    });
  }

}
