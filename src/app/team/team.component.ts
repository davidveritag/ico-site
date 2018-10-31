import { Component, OnInit, AfterViewInit } from '@angular/core';
import { Member } from './member/member.model';
import { members, advisors } from '../../data/teams';
import { TranslateService, LangChangeEvent } from '@ngx-translate/core';

@Component({
  selector: 'app-team',
  templateUrl: './team.component.html',
  styleUrls: ['./team.component.css']
})
export class TeamComponent implements OnInit, AfterViewInit {
  members: Member[] = members
  advisors: Member[] = advisors
  showMore: boolean = false
  showMoreLabel: string = "Show More"
  constructor(private translate: TranslateService) {
  }

  toggleShowMore(){
    this.showMore = !this.showMore;
    this.translate.get('TEAM.advisor-exp' + (this.showMore ? "Show Less" : "Show More")).subscribe((res: string) => {
       this.showMoreLabel = res
     });
   }
  

  ngOnInit() {
    this.translate.onLangChange.subscribe((event: LangChangeEvent) => {
      members.forEach( (member,i) => {
        this.translate.get('TEAM.member-name' + member.id).subscribe((res: string) => {
          member.name = res
        });
        this.translate.get('TEAM.member-country' + member.id).subscribe((res: string) => {
          member.country = res
        });
        this.translate.get('TEAM.member-bg' + member.id).subscribe((res: string) => {
          member.desc1 = res
        });
        this.translate.get('TEAM.member-exp' + member.id).subscribe((res: string) => {
          member.desc2 = res
        });
      })
      advisors.forEach( (advisor,i) => {
        this.translate.get('TEAM.advisor-name' + advisor.id).subscribe((res: string) => {
          advisor.name = res
        });
        this.translate.get('TEAM.advisor-country' + advisor.id).subscribe((res: string) => {
          advisor.country = res
        });
        this.translate.get('TEAM.advisor-bg' + advisor.id).subscribe((res: string) => {
          advisor.desc1 = res
        });
        this.translate.get('TEAM.advisor-exp' + advisor.id).subscribe((res: string) => {
          advisor.desc2 = res
        });
      })
    });
  }

  ngAfterViewInit(){
    $(document).ready(function(){
      var width = $('.photo').outerWidth();
      $('.photo').css('height', width+'px');


    var maxLength = 100;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            newStr = newStr.substr(0, Math.min(newStr.length, newStr.lastIndexOf(" ")))
            var removedStr = myStr.substring(newStr.length, $.trim(myStr).length);
            $(this).empty().html(newStr);            
            $(this).append('<span class="more-text" style="display:none;">' + removedStr + '</span>');
            $(this).append('<a href="javascript:void(0);" class="read-more"> read more...</a>');

        }
    });
    $(".read-more").click(function(){   
    $(this).siblings(".more-text").toggle(700);
    $(this).text(function(i, text){ return text === " read more..." ? " read less..." : " read more...";})
    });
    }); 
      
    
  }

}
