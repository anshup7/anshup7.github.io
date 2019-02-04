import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProjectCodesComponent } from './project-codes.component';

describe('ProjectCodesComponent', () => {
  let component: ProjectCodesComponent;
  let fixture: ComponentFixture<ProjectCodesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProjectCodesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProjectCodesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
