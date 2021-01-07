import { Component, OnInit } from '@angular/core';
import { HttpClient, } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  text = '';
  constructor(private http: HttpClient) { }
  submitExample(_Nick) {
    this.http.get('assets/test.php?q=' + _Nick.value).subscribe(el => {
      console.log(el);
      this.text = String(el);
    })
  }
  ngOnInit() {

  }
}
