import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-project-code',
  templateUrl: './project-code.component.html',
  styleUrls: ['./project-code.component.css']
})
export class ProjectCodeComponent implements OnInit {

  @Input() pcID: any;


  constructor() { }

  ngOnInit() {
  }

}
