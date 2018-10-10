import { Component, OnInit, Input } from '@angular/core';
import { Feature } from './feature.model';

@Component({
  selector: 'app-feature',
  templateUrl: './feature.component.html',
  styleUrls: ['./feature.component.css']
})
export class FeatureComponent implements OnInit {

  constructor() { }
  @Input('feature') feature: Feature;
  
  ngOnInit() {
  }

}
