import { Component, OnInit } from '@angular/core';
import { FormGroup } from "@angular/forms";
import { FormBuilder } from "@angular/forms";
import { Validators } from "@angular/forms";
import { FormControl } from "@angular/forms";

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {

  title = 'Create User'
  createuser: any = {
    email: '',
    password: '',
    Desc: '',
    FirstName: '',
    LastName: '',
    projectCode: ''
    
  };
  Createuser:FormGroup

  constructor( private fb: FormBuilder) { }

  ngOnInit() {
     this.Createuser = this.fb.group({
      email: ['',[Validators.required, validateEmail] ],
      password: ['', Validators.required],
      Desc: ['', Validators.required],
      FirstName: ['', Validators.required],
      LastName: ['', Validators.required],
      projectCode: ['', Validators.required]
    

    });
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