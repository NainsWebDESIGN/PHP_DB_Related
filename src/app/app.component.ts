import { Component, OnInit } from '@angular/core';
import { PostServerService } from '@service/PostServerService';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  data: any = [];
  constructor(private api: PostServerService) { }
  submitExample(_Nick, _Gen) {
    let req = { nickname: _Nick.value, gender: _Gen.value };
    this.api.postData(req);
  }
  ngOnInit() {
    this.api.data$.subscribe(el => {
      this.data = el;
      console.log(this.data);
    })
  }
}
