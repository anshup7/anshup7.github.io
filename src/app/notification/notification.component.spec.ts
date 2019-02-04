import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { Observable, of } from 'rxjs';

import { NotificationComponent } from './notification.component';
import { NotificationService } from '../../provider/notification/notification';

describe('NotificationComponent', () => {
  let component: NotificationComponent;
  let fixture: ComponentFixture<NotificationComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NotificationComponent ],
      providers: [NotificationService]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NotificationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should get created', () => {
    expect(component).toBeTruthy();
  });
  it('should be visible on service faliure/show published on notification service', () => {
    const compiled = fixture.debugElement.nativeElement;
    const notificationService = fixture.debugElement.injector.get(NotificationService);
    notificationService.updateNotification({show: true, status: 500, message: 'test'});
    fixture.detectChanges();
    expect(document.getElementById('snackbar').classList[0]).toEqual('show');
  });
    it('should hidden if show=false published on notification service', () => {
    const compiled = fixture.debugElement.nativeElement;
    let notificationService = fixture.debugElement.injector.get(NotificationService);
    notificationService.updateNotification({show: false, status: 500, message: 'test'});
    fixture.detectChanges();
    expect(document.getElementById('snackbar').classList[0]).toBeUndefined();
  });
});
