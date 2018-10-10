import { Component, OnInit, Injectable, AfterViewInit } from '@angular/core';
import { ScrollToModule, ScrollToService, ScrollToConfigOptions  } from '@nicky-lenaers/ngx-scroll-to';
import * as PicCarousel from 'PicCarousel';
import { BsModalService } from 'ngx-bootstrap/modal';
import { BsModalRef } from 'ngx-bootstrap/modal/bs-modal-ref.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-site-layout',
  templateUrl: './site-layout.component.html',
  styleUrls: ['./site-layout.component.css']
})

@Injectable()
export class SiteLayoutComponent implements OnInit, AfterViewInit{
  modalRef: BsModalRef;
  title = 'app';
  constructor(private _scrollToService: ScrollToService, private modalService: BsModalService){}
  
  public triggerScrollTo(target:string) {
    console.log(target)
    target = target.replace(/\s/g,''); 
    const config: ScrollToConfigOptions = {
      target: target,
      offset: -57,
    };
    this._scrollToService.scrollTo(config);
  }

  ngOnInit() {
    /* this.modalRef = this.modalService.show(ModalContentComponent, {class: 'modal-lg'}); */
  }	

  ngAfterViewInit() {

    $(document).ready(function(){
      if($(window).width() <= 860){
        var parentW =  $(window).width();
      }else{
        var parentW = $('.abt-carousel').width() || $(window).width();
      }
    
      var $img = $('.poster-list').find('li').eq(0).find('img');

      setTimeout(function(){
        if($img){
          var ratio = $('.abt-carousel').width() / ($img.width());
          var num = ($(window).width() - (parentW * 0.9))/2;
          var imgHeight = Math.floor($img.height() * ratio / 1.8);
          $('.poster-next-btn').css('right','0px');
          $('.poster-prev-btn').css('left','0px');
          console.log($img.height());
          var carWidth = (parentW * 0.9)  - 20;
          var carHeight = imgHeight * 0.9;
          var pWidth = (parentW * 0.9) / 2;
          var pHeight = imgHeight * 0.9;

          $('.tablet').css('height', (carHeight*1.17414248021) + 'px').css('width', (pWidth*1.34) + 'px');

          $('.poster-main').PicCarousel({
            'width':carWidth,
            'height': carHeight,
            'posterWidth': pWidth,
            'posterHeight': pHeight,
            'scale':0.8,
            'speed':1000,
            'autoPlay':/Mobile/.test(navigator.userAgent) ?  false : true,
            'delay':2000,
            'verticalAlign':'top'
          });
        }
      }, 1500);

      setTimeout(function(){
        var _h = $(window).height();
        var fromTop = $('.pie.container-fluid').offset().top;

        $(window).scroll(function(){
          var top = $(this).scrollTop();

          if (top + _h > fromTop){
            $('.bar-stats').addClass('display');
          }
        });
      }, 1500);
    }); 
    
  }
}

@Component({
  selector: 'modal-content',
  template: `
      <div class="modal-msg">
    <button type="button" class="close pull-right" aria-label="Close" (click)="modalRef.hide()">
      <span aria-hidden="true">&times;</span>
    </button>
    <h3 class="modal-title pull-left"><strong>Making it better</strong></h3><br><br>
    <p>Dear Investor,</p>
    <p>We are grateful for your support and interest in our ICO. You may be wondering about the delay in communication, and we would like to assure you that our team is investing significant time and effort to ensure the security of the token issuance is robust and you will have the peace of of mind during the entire ICO process.</p>
    <p>As we are also handling a huge volume of emails, there may be some delays earlier in our response. We seek your understanding as we strive to address your query and concerns with due care and diligence.</p>
    <p>Yours truly,<br>
Pei-Han & Morpheus Team</p>
  </div>
  `
})
 
export class ModalContentComponent implements OnInit {
  constructor(public modalRef: BsModalRef) {}
 
  ngOnInit() {
  }
}