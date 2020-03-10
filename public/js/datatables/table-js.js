jQuery(document).ready(function($) {
    "use strict";

    var allCategories = [1,2,3,4,5,6,7,8,9,10,11];
    var optionNumber = [2,1,1,1,1,1,1,1,1,1,1];

	$('#planstable').DataTable({
        responsive: true,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#userstable').DataTable({
        responsive: true,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#valuestable').DataTable({
        responsive: true,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#taxestable').DataTable({
        responsive: true,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
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
                        processing:     Lang.get('messages.processing'),
                        search:         Lang.get('messages.search'),
                        lengthMenu:     Lang.get('messages.view_rows'),
                        info:           Lang.get('messages.showing_rows'),
                        infoEmpty:      Lang.get('messages.showing_0_rows'),
                        infoFiltered:   Lang.get('messages.filter_message'),
                        infoPostFix:    "",
                        loadingRecords: Lang.get('messages.working'),
                        zeroRecords:    Lang.get('messages.no_data_found'),
                        emptyTable:     Lang.get('messages.no_data_in_table'),
                        paginate: {
                            first:      Lang.get('messages.first'),
                            previous:   Lang.get('messages.previous'),
                            next:       Lang.get('messages.next'),
                            last:       Lang.get('messages.last')
                        },
                        aria: {
                            sortAscending:  Lang.get('messages.order_asc'),
                            sortDescending: Lang.get('messages.order_desc')
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
                        processing:     Lang.get('messages.processing'),
                        search:         Lang.get('messages.search'),
                        lengthMenu:     Lang.get('messages.view_rows'),
                        info:           Lang.get('messages.showing_rows'),
                        infoEmpty:      Lang.get('messages.showing_0_rows'),
                        infoFiltered:   Lang.get('messages.filter_message'),
                        infoPostFix:    "",
                        loadingRecords: Lang.get('messages.working'),
                        zeroRecords:    Lang.get('messages.no_data_found'),
                        emptyTable:     Lang.get('messages.no_data_in_table'),
                        paginate: {
                            first:      Lang.get('messages.first'),
                            previous:   Lang.get('messages.previous'),
                            next:       Lang.get('messages.next'),
                            last:       Lang.get('messages.last')
                        },
                        aria: {
                            sortAscending:  Lang.get('messages.order_asc'),
                            sortDescending: Lang.get('messages.order_desc')
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
                    processing:     Lang.get('messages.processing'),
                    search:         Lang.get('messages.search'),
                    lengthMenu:     Lang.get('messages.view_rows'),
                    info:           Lang.get('messages.showing_rows'),
                    infoEmpty:      Lang.get('messages.showing_0_rows'),
                    infoFiltered:   Lang.get('messages.filter_message'),
                    infoPostFix:    "",
                    loadingRecords: Lang.get('messages.working'),
                    zeroRecords:    Lang.get('messages.no_data_found'),
                    emptyTable:     Lang.get('messages.no_data_in_table'),
                    paginate: {
                        first:      Lang.get('messages.first'),
                        previous:   Lang.get('messages.previous'),
                        next:       Lang.get('messages.next'),
                        last:       Lang.get('messages.last')
                    },
                    aria: {
                        sortAscending:  Lang.get('messages.order_asc'),
                        sortDescending: Lang.get('messages.order_desc')
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
                    processing:     Lang.get('messages.processing'),
                    search:         Lang.get('messages.search'),
                    lengthMenu:     Lang.get('messages.view_rows'),
                    info:           Lang.get('messages.showing_rows'),
                    infoEmpty:      Lang.get('messages.showing_0_rows'),
                    infoFiltered:   Lang.get('messages.filter_message'),
                    infoPostFix:    "",
                    loadingRecords: Lang.get('messages.working'),
                    zeroRecords:    Lang.get('messages.no_data_found'),
                    emptyTable:     Lang.get('messages.no_data_in_table'),
                    paginate: {
                        first:      Lang.get('messages.first'),
                        previous:   Lang.get('messages.previous'),
                        next:       Lang.get('messages.next'),
                        last:       Lang.get('messages.last')
                    },
                    aria: {
                        sortAscending:  Lang.get('messages.order_asc'),
                        sortDescending: Lang.get('messages.order_desc')
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
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });


    $('#plansdetailinvestment01').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment11').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment02').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment12').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment03').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment13').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment04').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment14').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment05').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment15').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment06').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment16').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment07').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment17').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment08').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment18').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment09').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment19').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment010').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment110').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment011').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailinvestment111').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness01').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness11').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness02').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness12').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness03').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness13').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness04').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness14').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness05').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness15').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness06').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness16').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness07').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness17').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness08').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness18').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness09').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness19').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness010').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness110').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness011').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });

    $('#plansdetailbusiness111').DataTable({
        responsive:     true,
        searching:      false,
        paging:         false,
        ordering:       false,
        info:           false,
		language: {
			processing:     Lang.get('messages.processing'),
			search:         Lang.get('messages.search'),
			lengthMenu:     Lang.get('messages.view_rows'),
			info:           Lang.get('messages.showing_rows'),
			infoEmpty:      Lang.get('messages.showing_0_rows'),
			infoFiltered:   Lang.get('messages.filter_message'),
			infoPostFix:    "",
			loadingRecords: Lang.get('messages.working'),
			zeroRecords:    Lang.get('messages.no_data_found'),
			emptyTable:     Lang.get('messages.no_data_in_table'),
			paginate: {
				first:      Lang.get('messages.first'),
				previous:   Lang.get('messages.previous'),
				next:       Lang.get('messages.next'),
				last:       Lang.get('messages.last')
			},
			aria: {
				sortAscending:  Lang.get('messages.order_asc'),
				sortDescending: Lang.get('messages.order_desc')
			}
		}
    });
});
