import { Component, OnInit } from '@angular/core';
import { tokenDist, financeDist } from '../../data/distribution-data';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-distribution',
  templateUrl: './distribution.component.html',
  styleUrls: ['./distribution.component.css']
})

export class DistributionComponent implements OnInit {

  constructor(private translate: TranslateService) {
    Object.assign(this, {tokenDist, financeDist});
  }
  
  onSelect(event) {
    console.log(event);
  }

  ngOnInit() {
  }

}
