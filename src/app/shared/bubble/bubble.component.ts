import { Component, OnInit, Input } from '@angular/core';
import { Bubble } from './bubble.model'

@Component({
  selector: 'app-bubble',
  templateUrl: './bubble.component.html',
  styleUrls: ['./bubble.component.css']
})
export class BubbleComponent implements OnInit {
  @Input('content') content: Bubble
  constructor() { }
  
  ngOnInit() {
  }

}
