import { Component, OnInit, Output, Input, EventEmitter } from '@angular/core';
import { AsyncHttpService } from "../provider/async-http.service";

@Component({
  selector: 'app-project-codes',
  templateUrl: './project-codes.component.html',
  styleUrls: ['./project-codes.component.css']
})
export class ProjectCodesComponent implements OnInit {

  projects: any;
  @Input() projectID: any;
  @Output() emitter: EventEmitter<any> = new EventEmitter();

  constructor(private service: AsyncHttpService) { }

  ngOnInit() {
    this.service.get('/assets/data/projects.json').subscribe(data => {
      this.projects = data.projects;
    })
  }

  editPO(id) {
    this.emitter.emit({ event: 'PC-CREATE', id: id });
  }

  createPO() {
    this.emitter.emit({ event: 'PC-CREATE', id: '' });
  }

}
