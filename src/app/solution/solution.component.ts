import { Component, OnInit } from '@angular/core';
import { Bubble } from '../shared/bubble/bubble.model'
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-solution',
  templateUrl: './solution.component.html',
  styleUrls: ['./solution.component.css']
})
export class SolutionComponent implements OnInit {
  solutions: Bubble[] = []
  constructor(private translate: TranslateService) { }

  ngOnInit() {
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {
      this.solutions = []
      for(let i=1;i<=4;i++){
        let solution = new Bubble('','','','solution')
        solution.iconUrl = '../../assets/icons/solution0'+ i +'.png'
        this.translate.get('SOLUTION.title' + i).subscribe((res: string) => {
          solution.title = res
        });
        this.translate.get('SOLUTION.description' + i).subscribe((res: string) => {
          solution.text = res
        });
        this.solutions.push(solution)
      }
    });
  }

}
