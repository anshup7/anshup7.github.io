import { Component, OnInit } from '@angular/core';
import { AsyncHttpService } from "../provider/async-http.service";

@Component({
  selector: 'app-approval',
  templateUrl: './approval.component.html',
  styleUrls: ['./approval.component.css']
})
export class ApprovalComponent implements OnInit {

  projects: any;
  constructor(private service: AsyncHttpService) { }

  ngOnInit() {
    this.service.get('/assets/data/projects.json').subscribe(data => {
      this.projects = data.projects;
    })
  }

}
