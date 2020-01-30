jQuery(document).ready(function($) {
    "use strict";

    var allCategories = [1,2,3,4,5,6,7,8,9,10,11];
    var optionNumber = [2,1,1,1,1,1,1,1,1,1,1];

	$('#planstable').DataTable({
        responsive: true,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			search:         "Kërkoni: ",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#userstable').DataTable({
        responsive: true,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			search:         "Kërkoni: ",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#valuestable').DataTable({
        responsive: true,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			search:         "Kërkoni: ",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#plansdetailbusiness0').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#plansdetailbusiness1').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#plansdetailinvestment0').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#plansdetailinvestment1').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#plansdetailloan').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#plansdetairesult1').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#plansdetairesult2').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#valuesdetail').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#editvaluesdetail').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#resulttable1').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    $('#resulttable2').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     "Duke përpunuar të dhënat...",
			lengthMenu:     "Shiko _MENU_ rreshta",
			info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
			infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
			infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
			infoPostFix:    "",
			loadingRecords: "Duke punuar...",
			zeroRecords:    "Asnjë e dhënë nuk u gjet",
			emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
			paginate: {
				first:      "E para",
				previous:   "Pas",
				next:       "Para",
				last:       "E fundit"
			},
			aria: {
				sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
				sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
			}
		}
    });

    for(var i = 0; i < allCategories.length; i++) {

        if(optionNumber[i] > 1) {
            for(var j = 0; j < optionNumber[i]; j++) {
                $('#businessinputtable' + allCategories[i] + j).DataTable({
                    responsive:     true,
                    searching:      false,
                    paging:         false,
                    ordering:       false,
                    info:           false,
                    language: {
                        processing:     "Duke përpunuar të dhënat...",
                        lengthMenu:     "Shiko _MENU_ rreshta",
                        info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
                        infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
                        infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
                        infoPostFix:    "",
                        loadingRecords: "Duke punuar...",
                        zeroRecords:    "Asnjë e dhënë nuk u gjet",
                        emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
                        paginate: {
                            first:      "E para",
                            previous:   "Pas",
                            next:       "Para",
                            last:       "E fundit"
                        },
                        aria: {
                            sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
                            sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
                        }
                    }
                });

                $('#planinputtable' + allCategories[i] + j).DataTable({
                    responsive:     true,
                    searching:      false,
                    paging:         false,
                    ordering:       false,
                    info:           false,
                    language: {
                        processing:     "Duke përpunuar të dhënat...",
                        lengthMenu:     "Shiko _MENU_ rreshta",
                        info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
                        infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
                        infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
                        infoPostFix:    "",
                        loadingRecords: "Duke punuar...",
                        zeroRecords:    "Asnjë e dhënë nuk u gjet",
                        emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
                        paginate: {
                            first:      "E para",
                            previous:   "Pas",
                            next:       "Para",
                            last:       "E fundit"
                        },
                        aria: {
                            sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
                            sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
                        }
                    }
                });
            }
        } else {
            $('#businessinputtable' + allCategories[i] + '0').DataTable({
                responsive:     true,
                searching:      false,
                paging:         false,
                ordering:       false,
                info:           false,
                language: {
                    processing:     "Duke përpunuar të dhënat...",
                    lengthMenu:     "Shiko _MENU_ rreshta",
                    info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
                    infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
                    infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
                    infoPostFix:    "",
                    loadingRecords: "Duke punuar...",
                    zeroRecords:    "Asnjë e dhënë nuk u gjet",
                    emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
                    paginate: {
                        first:      "E para",
                        previous:   "Pas",
                        next:       "Para",
                        last:       "E fundit"
                    },
                    aria: {
                        sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
                        sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
                    }
                }
            });

            $('#planinputtable' + allCategories[i] + '0').DataTable({
                responsive:     true,
                searching:      false,
                paging:         false,
                ordering:       false,
                info:           false,
                language: {
                    processing:     "Duke përpunuar të dhënat...",
                    lengthMenu:     "Shiko _MENU_ rreshta",
                    info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
                    infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
                    infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
                    infoPostFix:    "",
                    loadingRecords: "Duke punuar...",
                    zeroRecords:    "Asnjë e dhënë nuk u gjet",
                    emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
                    paginate: {
                        first:      "E para",
                        previous:   "Pas",
                        next:       "Para",
                        last:       "E fundit"
                    },
                    aria: {
                        sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
                        sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
                    }
                }
            });
        }
    }

    $('#loaninput').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
        language: {
            processing:     "Duke përpunuar të dhënat...",
            lengthMenu:     "Shiko _MENU_ rreshta",
            info:           "Duke shfaqur _START_ deri në _END_ nga _TOTAL_ rresht(a)",
            infoEmpty:      "Duke shfaqur 0 deri 0 nga 0 reshta",
            infoFiltered:   "(të filtruara nga gjithsej _MAX_ rresht(a))",
            infoPostFix:    "",
            loadingRecords: "Duke punuar...",
            zeroRecords:    "Asnjë e dhënë nuk u gjet",
            emptyTable:     "Nuk ka asnjë të dhënë në tabelë",
            paginate: {
                first:      "E para",
                previous:   "Pas",
                next:       "Para",
                last:       "E fundit"
            },
            aria: {
                sortAscending:  ": aktivizo për të rreshtuar kolonat në rend rritës",
                sortDescending: ": aktivizo për të rreshtuar kolonat në rend zbritës"
            }
        }
    });
});
