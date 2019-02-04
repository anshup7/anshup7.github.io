import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { AsyncHttpService } from "../provider/async-http.service";
import { Router } from '@angular/router';

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.css']
})
export class AdminComponent implements OnInit {

  projects: any;
  selected = 'USER';
  selectionID = '';

  constructor(private service: AsyncHttpService, private activatedRoute: ActivatedRoute, private router: Router) { }

  ngOnInit() {
  }

  selectUser() {
    this.selected = 'USER'
  }

  selectApproval() {
    this.selected = 'APPROVAL'
  }

  selectConfig(){
    this.selected = 'CONFIG'
  }
  
  filter(e) {
    this.selected = e.event;
    this.selectionID = e.id;
  }
}
