import { Component, OnInit, TemplateRef } from '@angular/core';
import { BsModalService } from 'ngx-bootstrap/modal';
import { BsModalRef } from 'ngx-bootstrap/modal/bs-modal-ref.service';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';
import { timeline } from '../../../data/timeline';
import { Forms } from '../../../data/registrationForms';

@Component({
  selector: 'app-timer',
  templateUrl: './timer.component.html',
  styleUrls: ['./timer.component.css']
})
export class TimerComponent implements OnInit {
  modalRef: BsModalRef;
  constructor(private translate: TranslateService, private modalService: BsModalService) { }
  stageTitle1: string = "Early-bird Premium Bonus";
  stageTitle2: string = "BONUS SALE";
  stageTitle3: string = "stage starts in:";

  badgeLabel1: string = "";
  badgeLabel2: string = "";
  badgeClass: string = "";

  days: string = '00';
  hours: string = '00';
  minutes: string = '00';
  seconds: string = '00';

  forms = Forms;

  ngOnInit() {
    let stage = this.getCountdownTime();

    stage = 'STAGE.' + stage;
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {
      this.badgeClass = (this.translate.currentLang == 'en') ? '' : 'adjust';

      this.translate.get(stage).subscribe((res: string) => {
        this.stageTitle1 = res
      });
      this.translate.get('TIMER.BONUS SALE').subscribe((res: string) => {
        this.stageTitle2 = res
      });
      this.translate.get('TIMER.stage starts in:').subscribe((res: string) => {
        this.stageTitle3 = res
      });
      this.translate.get('TIMER.30% Bonus').subscribe((res: string) => {
        this.badgeLabel1 = res
      });
    });
  }

  openModal(template: TemplateRef<any>) {
    this.modalRef = this.modalService.show(template, {class: 'modal-lg'});
  }

  getCountdownTime() {
    let now = new Date().getTime();
    let countDownDate = new Date("Mar 10, 2018 00:00:00").getTime();
    let stage = 'desc6';

    for(let phase in timeline){
      let phaseDate = new Date(phase).getTime();
      let phaseEnd = new Date(timeline[phase].end).getTime();

      if(now <= phaseEnd && now >= phaseDate){
        countDownDate = phaseEnd;
        stage = timeline[phase].title;
        break;
      }
    }

    let x = setInterval(() => {

      // Get todays date and time
      let now = new Date().getTime();
    
      // Find the distance between now an the count down date
      let distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24))
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
      let seconds = Math.floor((distance % (1000 * 60)) / 1000)

      this.days = days / 10 < 1? '0' + String(days) : String(days);
      this.hours = hours / 10 < 1 ? '0' + String(hours) : String(hours);
      this.minutes = minutes / 10 < 1 ? '0' + String(minutes) : String(minutes);
      this.seconds = seconds / 10 < 1 ? '0' + String(seconds) : String(seconds);
    
      // console.log(this.days,this.hours,this.minutes,this.seconds)
      // If the count down is finished, write some text 
      if (distance < 0) {
        this.days = '00';
        this.hours = '00';
        this.minutes = '00';
        this.seconds = '00';
        clearInterval(x);
      }
    }, 1000);

    return stage;
  }

}
