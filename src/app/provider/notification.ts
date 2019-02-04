import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

/**Custom observable to display notification.*/
@Injectable()
export class NotificationService {

  /**<b>Description : </b>Creating BehaviorSubject.*/
  private currentNameSubject = new BehaviorSubject({
    show: false,
    status: '',
    message: ''
  });

 /**<b>Description : </b>Adding next value to BehaviorSubject.*/
  updateNotification(notificationDetail) {
    this.currentNameSubject.next(notificationDetail);
  }

 /**<b>Description : </b>Returning BehaviorSubject so every one can subscribe to it.*/
  getNotification() {
    return this.currentNameSubject;
  }
}

