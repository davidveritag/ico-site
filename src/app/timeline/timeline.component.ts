import { Component, OnInit } from '@angular/core';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-timeline',
  templateUrl: './timeline.component.html',
  styleUrls: ['./timeline.component.css']
})

export class TimelineComponent implements OnInit {

  constructor(private translate: TranslateService) {
    $(document).ready(function(){
      function showBars(){
        var data =[
            {
              probability:40, 
              timeline:'9 MAR - 18 MAR', 
              isSale:false,
              active:true 
            },
            {
              probability:30, 
              timeline:'2 APR - 15 APR', 
              isSale:false,
              active:true 
            },
            {
              probability:'30', 
              timeline:'27 MAY ONWARD', 
              isSale:false,
              active:true 
            }]
          var $item = $('.statistics-item');
          $item.each(function(i){
            $item.eq(i).find('.statistics-col-bg').addClass('opacity-' + i).css('height',data[i].probability + '%');
            if (!!data[i].active) $item.eq(i).find('.statistics-col-bg').addClass("statistics-item-linght");
            if (!!data[i].isSale) {
              $item.eq(i).addClass("statistics-sale");
              setTimeout(function(){
                $item.eq(i).addClass("statistics-sale-show");
              },1000)
            }
            // if (!data[i].probability) {
            //   if (data[i].probability === 0) $item.eq(i).find('.statistics-text').text('Bonus' + data[i].probability + '%');
            //   $item.eq(i).addClass("statistics-not-data");
            // } else {
            //   $item.eq(i).find('.statistics-text').text('Bonus' + data[i].probability + '%');
            // }
          });
      }

      setTimeout(function(){
        var _h = $(window).height();
        var statisticsMainTop = $('.timeline.statistics-main').offset().top;

        $(window).scroll(function(){
          var top = $(this).scrollTop();

          if(top + _h > statisticsMainTop){
            showBars();
          }
        });
      }, 1500);
    });
      
  }
  
  onSelect(event) {
  }

  ngOnInit() {}

}
