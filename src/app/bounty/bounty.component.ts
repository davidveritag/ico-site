import { Component, OnInit, Output, EventEmitter  } from '@angular/core';

@Component({
  selector: 'app-bounty',
  templateUrl: './bounty.component.html',
  styleUrls: ['./bounty.component.css']
})
export class BountyComponent implements OnInit {

  @Output() navClickEvent = new EventEmitter<string>();

  constructor() { }

  ngOnInit() {
  }

  onNavLinkClicked(label:string){
    this.navClickEvent.emit(label)
  }

}