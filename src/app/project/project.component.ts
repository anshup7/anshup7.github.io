import { Component, OnInit, Input } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { AsyncHttpService } from "../provider/async-http.service";
import { NotificationService } from "../provider/notification";
import { FormGroup } from "@angular/forms";
import { FormBuilder } from "@angular/forms";
import { Validators } from "@angular/forms";
import { FormControl } from "@angular/forms";

@Component({
  selector: 'app-project',
  templateUrl: './project.component.html',
  styleUrls: ['./project.component.css']
})
export class ProjectComponent implements OnInit {

  @Input() title: any = 'Create Project';
  @Input() projectID: any;
  projectDetail: any = {
    name: '',
    managerID: '',
    startDate: '',
    endDate: '',
    projectType: '',
    description: '',
    status: '',
    type: ''
  };
  Editproject: FormGroup;
  constructor(private service: AsyncHttpService, private activatedRoute: ActivatedRoute, private notification: NotificationService, private fb: FormBuilder) { }


  ngOnInit() {
    if (this.projectID) {
      this.service.get('http://192.168.216.48:8080/protracker/app/api/projects/' + this.projectID).subscribe(data => {
        this.projectDetail.name = data.projectName;
        this.projectDetail.managerID = data.managerEmail;
        this.projectDetail.startDate = data.startDate;
        this.projectDetail.endDate = data.endDate;
        this.projectDetail.description = data.description;
        this.projectDetail.status = data.status;
        //this.projectDetail.type = data.projectName;
        console.log(data);
      })
    }
    this.Editproject = this.fb.group({
      name: ['', Validators.required],
      managerID: ['',[Validators.required, validateEmail] ],
      startDate: ['', Validators.required],
      endDate: ['', Validators.required],
      projectType: ['', Validators.required],
      description: ['', Validators.required],
      status: ['', Validators.required],
      type: ['', Validators.required]

    });
   

  }

  save() {
    console.log("################", this.Editproject)
    this.service.post('http://192.168.216.48:8080/protracker/app/api/projects/create',
      {
        id: this.projectID,
        projectTitle: this.projectDetail.name,
        projectName: this.projectDetail.name,
        description: this.projectDetail.description,
        startDate: this.projectDetail.startDate,
        endDate: this.projectDetail.endDate,
        status: this.projectDetail.status,
        managerName: this.projectDetail.managerID,
        managerEmail: this.projectDetail.managerID
      }).subscribe(data => {
        this.notification.updateNotification({
          show: true,
          status: data.responseCode,
          message: data.responseCode == 200 ? 'Success' : 'Faliure'
        })
      })
  }

}
 function validateEmail(c: FormControl) {
    let EMAIL_REGEXP = /^[\w._]+@infosys\.(com)$/;
    return EMAIL_REGEXP.test(c.value) ? null : {
        emailError: {
            message: "Email is invalid"
        }
    };
}

