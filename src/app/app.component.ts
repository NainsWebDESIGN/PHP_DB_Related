import { Component, OnInit } from '@angular/core';
import { HttpClient, } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  data: any = [];
  constructor(private http: HttpClient) { }
  submitExample(_Nick, _Gen) {
    const data = new FormData();
    data.append('nickname', _Nick.value)
    data.append('gender', _Gen.value)
    this.http.post('assets/test.php', data).subscribe(el => {
      this.data = el;
      console.log(this.data);
    })
  }
  ngOnInit() {

  }
}
