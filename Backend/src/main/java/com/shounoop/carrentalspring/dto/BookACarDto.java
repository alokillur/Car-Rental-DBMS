package com.shounoop.carrentalspring.dto;

import lombok.Data;

import java.util.Date;

import com.shounoop.carrentalspring.enums.BookCarStatus;

@Data
public class BookACarDto {
    private Long id;
    private Date fromDate;
    private Date toDate;
    private Long days;
    private Long price;
    private BookCarStatus bookCarStatus;
    private Long carId;
    private Long userId;
    private String username;
    private String email;
}
