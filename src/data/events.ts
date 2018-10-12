import { Stage } from '../app/event/stage/stage.model';

export const stages: Stage[] = [
    // new Stage(1,'bonus1','Pre-ICO Platinum Bonus','date1','time','ongoing'),
    new Stage(2,'bonus2','Early-bird Premium Bonus','date2','time','ongoing','type2', 'Feb 24, 2018 00:00:00', 'Mar 9, 2018 23:59:59'),
    //new Stage(3,'bonus3','Early-bird Premium Bonus','date3','time','new'),
    new Stage(4,'bonus4','Pre-sales Additional Bonus','date4','time','new','type4', 'Mar 10, 2018 00:00:00', 'Mar 23, 2018 23:59:59'),
    //new Stage(5,'bonus5','Pre-sales Additional Bonus','date5','time','new'),
    new Stage(6,'bonus6','Official Sales','date6','time','new','type6', 'Mar 24, 2018 00:00:00', 'Apr 15, 2018 23:59:59'),
  ]