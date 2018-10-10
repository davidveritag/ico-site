import { Component, OnInit } from '@angular/core';
import { Bubble } from '../shared/bubble/bubble.model'
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-problem',
  templateUrl: './problem.component.html',
  styleUrls: ['./problem.component.css']
})
export class ProblemComponent implements OnInit {
  problems: Bubble[] = []
  constructor(private translate: TranslateService) { }

  ngOnInit() {
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {
      this.problems = []
      for(let i=1;i<=4;i++){
        let problem = new Bubble('','','','problem')
        problem.iconUrl = '../../assets/icons/ProblemStatement0'+ i +'.png'
        this.translate.get('PROBLEM.title' + i).subscribe((res: string) => {
          problem.title = res
        });
        this.translate.get('PROBLEM.description' + i).subscribe((res: string) => {
          problem.text = res
        });
        this.problems.push(problem)
      }
    });
  }

}
