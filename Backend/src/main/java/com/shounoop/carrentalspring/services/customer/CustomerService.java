package com.shounoop.carrentalspring.services.customer;

import java.util.List;

import com.shounoop.carrentalspring.dto.BookACarDto;
import com.shounoop.carrentalspring.dto.CarDto;

public interface CustomerService {
    List<CarDto> getAllCars();

    boolean bookACar(BookACarDto bookACarDto);

    CarDto getCarById(Long id);

    List<BookACarDto> getBookingsByUserId(Long id);
}
