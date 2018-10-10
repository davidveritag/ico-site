import { Component, OnInit, Input } from '@angular/core';
import { Phase } from './phase.model';
import { TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'app-phase',
  templateUrl: './phase.component.html',
  styleUrls: ['./phase.component.css']
})
export class PhaseComponent implements OnInit {
  @Input() content: Phase
  
  isArray(v){
  	if(v instanceof Array){
  		return true;
  	}else{
  		return false;
  	}
  }

  constructor(private translate: TranslateService) { }

  ngOnInit() {
  }

}
