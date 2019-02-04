import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { AsyncHttpService } from "../provider/async-http.service";
import { Router } from '@angular/router';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.css']
})
export class UsersComponent implements OnInit {

  projects: any;
  @Output() emitter: EventEmitter<any> = new EventEmitter();

  constructor(private service: AsyncHttpService, private router: Router) { }

  ngOnInit() {
    this.service.get('/assets/data/projects.json').subscribe(data => {
      this.projects = data.projects;
    })
  }

  editPO(id) {
    this.emitter.emit({ event: 'USER-CREATE', id: id });
  }

  createPO() {
    this.emitter.emit({ event: 'USER-CREATE', id: '' });
  }
}
