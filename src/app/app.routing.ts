import { Routes, RouterModule } from '@angular/router';

import { SiteLayoutComponent } from './site-layout/site-layout.component';

import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgxChartsModule } from '@swimlane/ngx-charts';

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
import { TimelineComponent } from './timeline/timeline.component';
import { ReasonComponent } from './reason/reason.component';
import { AdvantageComponent } from './advantage/advantage.component';
import { FeatureComponent } from './advantage/feature/feature.component';

import { BountyComponent } from './bounty/bounty.component';
import { FaqComponent } from './faq/faq.component';

const appRoutes: Routes = [

    //Site routes goes here
    {
        path: '',
        component: SiteLayoutComponent,
        children: [
          { path: '', component: SiteLayoutComponent, pathMatch: 'full'}
        ]
    },

    //independent routes
    { path: 'bounty', component: BountyComponent},
    { path: 'faq', component: FaqComponent},
    { path: 'FAQ', component: FaqComponent},
    // otherwise redirect to home
    { path: '**', redirectTo: '' }
];

export const routing = RouterModule.forRoot(appRoutes);
