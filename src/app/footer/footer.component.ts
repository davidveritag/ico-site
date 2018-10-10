import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { NavigationLink, NavigationLinks } from '../../data/navlink';
import { TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent implements OnInit {

  navlinks: NavigationLink[];
  stat = {
    price: '0.0001 BTC',
    earn: '+10%',
    participants: '100 000+'
  };

  @Output() navClickEvent = new EventEmitter<string>();
  constructor(private translate: TranslateService) {
    $(window).scroll(function(){
      var top = $(this).scrollTop();
      var scrollLen = $('body').height() - $(window).height();

      if(top == 0){
        $('.persistent-footer').addClass("hidden");
        $('.persistent-footer').removeClass("fixed");
      }else if (top > 0 && top < scrollLen - $('footer').height() - $('.persistent-footer').height()) {
        $('.persistent-footer').addClass("fixed");
        $('.persistent-footer').removeClass("hidden");
      } else {
        $('.persistent-footer').removeClass("fixed");
      }
    });
  }

  ngOnInit() {
    this.navlinks = NavigationLinks;
  }

  onLinkClicked(label:string){
    this.navClickEvent.emit(label)
  }

}
