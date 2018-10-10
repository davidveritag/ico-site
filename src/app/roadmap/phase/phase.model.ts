export class Phase {
    constructor(
        public index: string, 
        public title: string,
        public time: string,
        public desc: string,
        public status: string,
        public isFirst: boolean,
        public isLast: boolean,
    ){}
  }