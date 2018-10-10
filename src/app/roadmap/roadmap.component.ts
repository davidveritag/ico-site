import { Component, OnInit } from '@angular/core';
import { Phase } from './phase/phase.model';
import { PACKAGE_ROOT_URL } from '@angular/core/src/application_tokens';
import { NgbTabsetConfig } from '@ng-bootstrap/ng-bootstrap';
import { techPhases, bizPhases } from '../../data/roadmapPhases'
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-roadmap',
  templateUrl: './roadmap.component.html',
  styleUrls: ['./roadmap.component.css'],
  providers: [NgbTabsetConfig]
})
export class RoadmapComponent implements OnInit {
  tabHeader1: String = '';
  tabHeader2: String = '';
  techPhases: Phase[] = techPhases;
  bizPhases: Phase[] = bizPhases;
  constructor(config: NgbTabsetConfig,private translate: TranslateService) {
    config.justify = 'center';
    config.type = 'pills';
  }

  ngOnInit() {
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {
      techPhases.forEach( (techPhase,i) => {
        this.translate.get('ROADMAP.tech-title' + i).subscribe((res: string) => {
          techPhase.title = res
        });
        this.translate.get('ROADMAP.tech-date' + i).subscribe((res: string) => {
          techPhase.time = res
        });
        this.translate.get('ROADMAP.tech-desc' + i).subscribe((res: string) => {
          techPhase.desc = res
        });
      })

      bizPhases.forEach( (bizPhase,i) => {
        this.translate.get('ROADMAP.biz-title' + i).subscribe((res: string) => {
          bizPhase.title = res
        });
        this.translate.get('ROADMAP.biz-date' + i).subscribe((res: string) => {
          bizPhase.time = res
        });
        this.translate.get('ROADMAP.biz-desc' + i).subscribe((res: string) => {
          bizPhase.desc = res
        });
      })

      // this.translate.get('ROADMAP.Technical').subscribe((res: string) => {
      //   this.tabHeader1 = res
      // });
      // this.translate.get('ROADMAP.Business').subscribe((res: string) => {
      //   this.tabHeader2 = res
      // });

    });
  }

}
