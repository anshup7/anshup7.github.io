import { TestBed, inject } from '@angular/core/testing';

import { BoatService } from './boat.service';

describe('BoatService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [BoatService]
    });
  });

  it('should be created', inject([BoatService], (service: BoatService) => {
    expect(service).toBeTruthy();
  }));
});
