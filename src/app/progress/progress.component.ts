import { Component, OnInit, AfterViewInit } from '@angular/core';
import { ProgressbarModule } from 'ngx-bootstrap/progressbar';
import { PopoverModule } from 'ngx-bootstrap/popover';
import { progress } from '../../data/progress';

@Component({
  selector: 'app-progress',
  templateUrl: './progress.component.html',
  styleUrls: ['./progress.component.css']
})

export class ProgressComponent implements OnInit {
  max: number = progress.target;
  dynamic: number = progress.current;
  whitelistCount: number = progress.registered;
  timestamp: string = progress.updated;

  constructor() {}

  ngOnInit() {
  }

  ngAfterViewInit() {
  	function movePopOvers(){
  		var barWidth = parseInt($('.progress').width());
  		var progressWidth = parseInt($('.progress-bar').width());
  		var popWidth = $('.light.popover').width();
  		var dist = barWidth - popWidth; 
  		var curDist = 'calc(' + progressWidth + 'px - 1.8em)';

  		$('.light.popover').css('left', dist+'px');
  		$('.current.popover').css('left', curDist);
  	}

  	movePopOvers();

  	$(window).resize(function(){
  		movePopOvers();
  	});

  }

}
