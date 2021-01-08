import { Component, OnInit } from '@angular/core';
import { HttpClient, } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  text = "";
  constructor(private http: HttpClient) { }
  submitExample(_Nick, _Gen) {
    console.log(_Nick.value);
    console.log(_Gen.value);
    const data = new FormData();
    data.append('nickname', _Nick.value)
    data.append('gender', _Gen.value)
    this.http.post('assets/test.php', data).subscribe(el => {
      Array(el).length == 1 ? this.text = el[0] : this.text = "nickname is " + el[0] + " , gender is " + el[1];
    })
  }
  ngOnInit() {

  }
}
