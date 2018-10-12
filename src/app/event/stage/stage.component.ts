import { Component, OnInit, Input } from '@angular/core';
import { Stage } from './stage.model';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-stage',
  templateUrl: './stage.component.html',
  styleUrls: ['./stage.component.css']
})
export class StageComponent implements OnInit {
  @Input('stage') currentStage: Stage
  constructor(private translate: TranslateService) { }

  ngOnInit() {
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {
      this.translate.get('STAGE.bonus' + this.currentStage.id).subscribe((res: string) => {
        this.currentStage.title = res
      });
      this.translate.get('STAGE.eth' + this.currentStage.id).subscribe((res: string) => {
        this.currentStage.dateString = res
      });
      this.translate.get('STAGE.desc' + this.currentStage.id).subscribe((res: string) => {
        this.currentStage.subTitle = res
      });
      this.translate.get('STAGE.type'+ this.currentStage.id).subscribe((res: string) => {
        this.currentStage.typeString = res
      });
      // this.translate.get('STAGE.per'+ this.currentStage.id).subscribe((res: string) => {
      //   this.currentStage.perString = res
      // });
    })
  }

}
