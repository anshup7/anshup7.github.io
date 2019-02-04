import { Component, OnInit } from '@angular/core';
import { NotificationService } from '../provider/notification';

@Component({
  selector: 'app-notification',
  templateUrl: './notification.component.html',
  styleUrls: ['./notification.component.css']
})
export class NotificationComponent implements OnInit {

  show: boolean = true;
  status: any;
  message: any;
  constructor(private notification: NotificationService) { }

  ngOnInit() {
    this.notification.getNotification().subscribe((data) => {
      this.show = data.show;
      this.status = data.status;
      this.message = data.message;
      setTimeout(() => {
        this.show = false;
      }, 2000);
    })

  }


}
