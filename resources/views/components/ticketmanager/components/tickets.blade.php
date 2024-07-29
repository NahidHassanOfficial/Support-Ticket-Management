            <div class="d-flex flex-column bg-light shadow-sm rounded p-3 gap-3 ">
                <div class="d-flex justify-content-between ">
                    <p class="text-sm text-secondary">
                        {{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}
                    </p>
                    <div class="d-flex gap-3">
                        <p
                            class="badge @if ($ticket->severity == 'Low') text-bg-info @elseif($ticket->severity == 'Medium')  text-bg-warning @else text-bg-danger @endif p-2">
                            {{ $ticket->severity }}
                        </p>
                        <p
                            class="badge @if ($ticket->status == 'Closed') text-bg-success @else text-bg-warning @endif  p-2">
                            {{ $ticket->status }}
                        </p>
                    </div>
                </div>
                @if ($ticket->status == 'Closed')
                    <p class="text-end text-success-emphasis"><strong>Closed by: </strong> John Smith
                    </p>
                @endif
                <div class="text-start @if ($ticket->status == 'Closed') text-decoration-line-through @endif">
                    <p class="text-info-emphasis"><strong>Author:</strong> {{ $ticket->authorName }}</p>
                    <p class="fs-3 fw-bold">{{ $ticket->ticketTitle }}</p>
                    <p class="description ">{{ $ticket->description }}</p>

                    <div class="attachments d-flex gap-2 flex-wrap">
                        @if (!empty($ticket->attachment))
                            @php
                                $attachments = json_decode($ticket->attachment, true);
                            @endphp
                            @if ($attachments !== null)
                                @foreach ($attachments as $attachment)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="rounded-pill bg-success-subtle btn btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#ticket-modal-{{ $ticket->id }}-{{ $loop->iteration }}">
                                        Attachment-{{ $loop->iteration }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade"
                                        id="ticket-modal-{{ $ticket->id }}-{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <img src="{{ route('showImage', ['filename' => $attachment]) }}"
                                                    alt="Image">

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    </div>


                </div>

                <div class="align-self-end">
                    <form action="{{ route('tickets.update', $ticket->ticket_id) }}" method="POST">
                        @method('PATCH')

                        <input type="hidden" name="closedBy" value="{{ 4 }}">
                        <input type="hidden" name="status"
                            value="{{ $ticket->status == 'Open' ? 'Closed' : 'Open' }}">

                        <button
                            class="btn {{ $ticket->status == 'Open' ? 'btn-outline-success' : 'btn-outline-warning' }}">
                            {{ $ticket->status == 'Open' ? 'Mark Closed' : 'Mark Open' }}
                        </button>

                    </form>
                </div>
            </div>
