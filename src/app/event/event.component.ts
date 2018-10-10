import { Component, OnInit } from '@angular/core';
import { Stage } from './stage/stage.model';
import { stages } from '../../data/events';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-event',
  templateUrl: './event.component.html',
  styleUrls: ['./event.component.css']
})
export class EventComponent implements OnInit {
  stages: Stage[] = stages
  constructor(private translate: TranslateService) {
    let hasOngoing = false;
    let now = new Date().getTime();

    for(let stage in stages){
      let thisStart = new Date(stages[stage].startDate).getTime();
      let thisEnd = new Date(stages[stage].endDate).getTime();

      if(now <= thisEnd && now >= thisStart){
        stages[stage].status = 'ongoing';
      }else if(now > thisEnd){
        stages[stage].status = 'ended';
      }else{
        stages[stage].status = 'new';
      }
      stages[stage].status = 'ended';
    }

  	$(document).ready(function(){
  		var parent = $('.stages');
		var child = $('.stage-wrap');
		child.css('padding-bottom', (child.outerWidth() - child.innerWidth())+'px');
  	});

  }

  ngOnInit() {
  }
}
