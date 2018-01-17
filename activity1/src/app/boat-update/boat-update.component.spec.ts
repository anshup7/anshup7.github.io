import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BoatUpdateComponent } from './boat-update.component';

describe('BoatUpdateComponent', () => {
  let component: BoatUpdateComponent;
  let fixture: ComponentFixture<BoatUpdateComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BoatUpdateComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BoatUpdateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
