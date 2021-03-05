import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class PostServerService {
    data: any = [];
    private SubData = new BehaviorSubject(this.data);
    data$ = this.SubData.asObserverble();
    constructor(private http: HttpClient) { }
    postData(_Obj: any) {
        let dataKeys = Object.keys(_Obj);
        const req = new FormData();
        for (let i = 0; i < dataKeys.length; i++) { req.append(dataKeys[i], _Obj[dataKeys[i]]); }
        this.http.post('assets/test.php', req).subscribe(el => {
            this.data = el;
            this.SubData.next(this.data);
        })
    }
}
