import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { AsyncHttpService } from "../provider/async-http.service";
import { Router } from '@angular/router';
import { animate, state, style, transition, trigger } from '@angular/animations';

@Component({
  selector: 'app-master-project',
  templateUrl: './master-project.component.html',
  styleUrls: ['./master-project.component.css']
})
export class MasterProjectComponent implements OnInit {

  projects: any;
  selected = 'PD';
  selectionID = '';
  projectID = '';
  constructor(private service: AsyncHttpService, private activatedRoute: ActivatedRoute, private router: Router) { }

  ngOnInit() {
    this.activatedRoute.params.subscribe(params => {
      if (params.id) this.projectID = params.id;
    })
  }

  selectPO() {
    this.selected = 'PO'
  }

  selectIN() {
    this.selected = 'IN';
    this.selectionID = '';
  }

  selectPD() {
    this.selected = 'PD';
    this.selectionID = '';
  }

  selectPC() {
    this.selected = 'PC';
    this.selectionID = '';
  }

  filter(e) {
    this.selected = e.event;
    this.selectionID = e.id;
  }

}
