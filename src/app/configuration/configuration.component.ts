import { Component, OnInit } from '@angular/core';
import { FormGroup } from "@angular/forms";
import { FormBuilder } from "@angular/forms";
import { Validators } from "@angular/forms";

@Component({
  selector: 'app-configuration',
  templateUrl: './configuration.component.html',
  styleUrls: ['./configuration.component.css']
})
export class ConfigurationComponent implements OnInit {

  selection = 'Project Code';
   configuration: any = {
    name: '',
    managerID: '',
    startDate: '',
    endDate: '',
    projectType: '',
    description: '',
    status: '',
    type: ''
  };
  Configuration:FormGroup
  constructor(private fb: FormBuilder) { }

  ngOnInit() {
     this.Configuration = this.fb.group({
      projectCode: ['', Validators.required],
      Code: ['', Validators.required],
      ProjectDesc: ['', Validators.required]

    
  });
  }

}
