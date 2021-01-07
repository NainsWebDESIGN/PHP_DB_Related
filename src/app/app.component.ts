import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = ['', ''];
  constructor(private http: HttpClient) { }
  submitExample(_Nick, _Gen) {
    console.log(_Nick.value);
    console.log(_Gen.value);
    const data = JSON.stringify({ "nickname": _Nick.value, "gender": _Gen.value })
    this.http.post('assets/test.php', data).subscribe(el => {
      console.log(el);
    })
  }
  ngOnInit() {

  }
}
