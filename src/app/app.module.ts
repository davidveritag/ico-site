import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule, HttpClient } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { ProgressbarModule } from 'ngx-bootstrap/progressbar';
import { PopoverModule } from 'ngx-bootstrap/popover';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgxChartsModule } from '@swimlane/ngx-charts';

import { ModalModule } from 'ngx-bootstrap/modal';

import { AppComponent } from './app.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { TimerComponent } from './dashboard/timer/timer.component';
import { AboutComponent } from './about/about.component';
import { EventComponent } from './event/event.component';
import { TeamComponent } from './team/team.component';
import { HeaderComponent } from './dashboard/header/header.component';
import { CarouselComponent } from './carousel/carousel.component';
import { StageComponent } from './event/stage/stage.component';
import { ProblemComponent } from './problem/problem.component';
import { BubbleComponent } from './shared/bubble/bubble.component';
import { SolutionComponent } from './solution/solution.component';
import { FooterComponent } from './footer/footer.component';
import { RoadmapComponent } from './roadmap/roadmap.component';
import { PhaseComponent } from './roadmap/phase/phase.component';
import { MemberComponent } from './team/member/member.component';
import { BenefitsComponent } from './benefits/benefits.component';
import { DistributionComponent } from './distribution/distribution.component';
import { GenerationComponent } from './generation/generation.component';
import { TimelineComponent } from './timeline/timeline.component';
import { ReasonComponent } from './reason/reason.component';
import { ScrollToModule } from '@nicky-lenaers/ngx-scroll-to';
import { AdvantageComponent } from './advantage/advantage.component';
import { FeatureComponent } from './advantage/feature/feature.component';
import { LogosComponent } from './logos/logos.component';

import { BountyComponent } from './bounty/bounty.component';
import { FaqComponent } from './faq/faq.component';
import { SiteLayoutComponent, ModalContentComponent } from './site-layout/site-layout.component';

import { routing } from './app.routing';

import { TranslateModule, TranslateLoader } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { ProgressComponent } from './progress/progress.component';

// AoT requires an exported function for factories
export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http);
}

@NgModule({
  declarations: [
    AppComponent,
    DashboardComponent,
    TimerComponent,
    AboutComponent,
    EventComponent,
    TeamComponent,
    HeaderComponent,
    CarouselComponent,
    StageComponent,
    ProblemComponent,
    BubbleComponent,
    SolutionComponent,
    FooterComponent,
    RoadmapComponent,
    PhaseComponent,
    MemberComponent,
    BenefitsComponent,
    DistributionComponent,
    GenerationComponent,
    TimelineComponent,
    ReasonComponent,
    AdvantageComponent,
    FeatureComponent,
    BountyComponent,
    FaqComponent,
    SiteLayoutComponent,
    LogosComponent,
    ModalContentComponent,
    ProgressComponent
    
  ],
  imports: [
    BrowserModule,
    NgbModule.forRoot(),
    ScrollToModule.forRoot(),
    BrowserAnimationsModule,
    ModalModule.forRoot(),
    ProgressbarModule.forRoot(),
    PopoverModule.forRoot(),
    NgxChartsModule,
    routing,
    HttpClientModule,
    TranslateModule.forRoot({
      loader: {
          provide: TranslateLoader,
          useFactory: HttpLoaderFactory,
          deps: [HttpClient]
      }
  })
  ],
  entryComponents: [
    ModalContentComponent
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
