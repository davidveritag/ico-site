import { Component, OnInit, Input } from '@angular/core';
import { Member } from './member.model'

@Component({
  selector: 'app-member',
  templateUrl: './member.component.html',
  styleUrls: ['./member.component.css']
})
export class MemberComponent implements OnInit {
  @Input() info: Member;
  constructor() { }

  ngOnInit() {
  }

}
